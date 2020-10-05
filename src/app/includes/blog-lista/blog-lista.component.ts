import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-blog-lista',
  templateUrl: './blog-lista.component.html',
  styleUrls: ['./blog-lista.component.css']
})
export class BlogListaComponent implements OnInit, OnChanges {

  @Input()
  categoria: any;

  pages: any;
  posts: any;
  loading: any;

  constructor(
    private postsService: PostsService
  ) { }

  carregarMais() {

    this.loading = true;

    this.pages++;

    this.postsService.all(4 * this.pages, this.categoria).then(
      posts => {
        this.posts = posts;
        this.loading = false;
      }
    );

  }

  ngOnInit() {
    this.inicializarCategoria();
  }

  ngOnChanges(changes: SimpleChanges): void {
    this.categoria = changes.categoria.currentValue;
    this.inicializarCategoria();
  }

  private inicializarCategoria() {
    this.loading = false;
    this.posts = [];
    this.pages = 1;

    this.postsService.all(4 * this.pages, this.categoria).then(
      posts => {
        this.posts = posts;
      }
    );
  }

}
