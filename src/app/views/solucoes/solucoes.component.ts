import { Component, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-solucoes',
  templateUrl: './solucoes.component.html',
  styleUrls: ['./solucoes.component.css']
})
export class SolucoesComponent implements OnInit {

  posts: any;

  titulo = 'Nossas';
  subtitulo = 'Soluções';

  constructor(
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.postsService.all(100, 19).then(
      posts => {
        this.posts = posts;
      }
    );

  }

}
