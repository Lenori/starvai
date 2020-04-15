import { Component, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-parceiros',
  templateUrl: './parceiros.component.html',
  styleUrls: ['./parceiros.component.css']
})
export class ParceirosComponent implements OnInit {

  posts: any;

  titulo = 'Nossos';
  subtitulo = 'Parceiros';

  constructor(
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.postsService.all(100, 21).then(
      posts => {
        this.posts = posts;
      }
    );

  }

}
