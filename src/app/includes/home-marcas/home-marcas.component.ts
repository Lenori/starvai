import { Component, OnDestroy, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';

@Component({
  selector: 'app-home-marcas',
  templateUrl: './home-marcas.component.html',
  styleUrls: ['./home-marcas.component.css']
})
export class HomeMarcasComponent implements OnInit, OnDestroy {

  posts: any;
  timer: any;
  max: any;
  min: any;

  step = 4;

  constructor(
    private postsService: PostsService
  ) { }

  carrossel() {

    console.log(this.max);
    console.log(this.posts.length);

    if (this.max === this.posts.length) {
      this.max = 3;
      this.min = 0;
      return;
    }

    this.max = this.max + this.step;
    this.min = this.min + this.step;

    if (this.max > this.posts.length) {
      this.max = this.posts.length;
      this.min = this.posts.length - this.step;
    }

  }

  ngOnInit() {

    this.max = 3;
    this.min = 0;

    this.postsService.all(100, 20).then(
      posts => {
        this.posts = posts;
        this.timer = window.setInterval(() => this.carrossel(), 5000);
      }
    );

  }

  ngOnDestroy() {
    clearInterval(this.timer);
  }

}
