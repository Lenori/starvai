import {Component, OnInit} from '@angular/core';
import {CategoriasService} from '../../services/categorias/categorias.service';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  categorias: any;
  posts: Array<any>;

  titulo = 'Blog';

  constructor(
    private categoriasService: CategoriasService,
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.posts = [];

    this.categoriasService.all().then(
      data => {
        this.categorias = data;
        this.categorias.forEach((cat, index) => {
            this.postsService.all('100', cat.id).then(
              posts => {
                this.posts.push(...this.removerPostsRepetidos(posts, this.posts));
                if (cat.id === data[data.length - 1].id) {
                  this.posts = Object.assign(
                    [],
                      this.posts.sort(this.funcaoDeOrdenacaoPost)
                    );
                }
              }
            );
        });
      }
    );

  }

  private removerPostsRepetidos(listaDeNovosPosts: Array<any>, listaDePosts: Array<any>): Array<any> {
    return listaDeNovosPosts.filter(novoPost => !listaDePosts.some(postAntigo => postAntigo.id === novoPost.id));
  }

  private funcaoDeOrdenacaoPost(postA, postB) {
    const dataPostA = new Date(postA.modified);
    const dataPostB = new Date(postB.modified);

    if (dataPostA > dataPostB) {
      return -1;
    }

    if (dataPostA < dataPostB) {
      return 1;
    }

    return 0;
  }

}
