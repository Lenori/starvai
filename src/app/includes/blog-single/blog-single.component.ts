import { Component, OnInit } from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';
import {ActivatedRoute} from '@angular/router';

@Component({
  selector: 'app-blog-single',
  templateUrl: './blog-single.component.html',
  styleUrls: ['./blog-single.component.css']
})
export class BlogSingleComponent implements OnInit {

  id: any;
  post: any;
  titulo: any;

  constructor(
    private route: ActivatedRoute,
    private postsService: PostsService
  ) { }

  ngOnInit() {

    this.id = this.route.snapshot.params.id;

    this.postsService.single(this.id).then(
      data => {
        this.post = data;
        this.titulo = data.title.rendered;
      }
    );

  }

}
