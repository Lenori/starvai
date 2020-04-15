import { Component, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-marcas',
  templateUrl: './marcas.component.html',
  styleUrls: ['./marcas.component.css']
})
export class MarcasComponent implements OnInit {

  posts: any;

  titulo = 'Marcas';
  subtitulo = 'parceiras';

  constructor(
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.postsService.all(100, 20).then(
      posts => {
        this.posts = posts;
      }
    );

  }
}
