import { Component, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-trabalhos',
  templateUrl: './trabalhos.component.html',
  styleUrls: ['./trabalhos.component.css']
})
export class TrabalhosComponent implements OnInit {

  posts: any;

  titulo = 'Trabalhos';
  subtitulo = 'Realizados';

  constructor(
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.postsService.all(100, 18).then(
      posts => {
        this.posts = posts;
      }
    );

  }

}
