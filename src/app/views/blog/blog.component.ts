import { Component, OnInit } from '@angular/core';
import {CategoriasService} from '../../services/categorias/categorias.service';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  categorias: any;
  posts: any;

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
          if (index < 3) {
            this.postsService.all('3', cat.id).then(
              posts => {
                this.posts.push(posts);
              }
            );
          }
        });
      }
    );

  }

}
