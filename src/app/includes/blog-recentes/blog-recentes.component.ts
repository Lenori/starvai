import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-blog-recentes',
  templateUrl: './blog-recentes.component.html',
  styleUrls: ['./blog-recentes.component.css']
})
export class BlogRecentesComponent implements OnInit {

  @Input()
  categoria: any;

  @Input('posts')
  set setPosts(posts: Array<any>) {
    this.listaDePosts = posts;
    this.postPaginados = posts.slice(0, 4);
  }

  listaDePosts: Array<any>;
  postPaginados: Array<any>;

  loading: any = false;

  constructor() { }

  ngOnInit() {}

  carregarMais() {
    const tamanhoAtual = this.postPaginados.length;
    this.postPaginados = this.listaDePosts.slice(0, tamanhoAtual + 4);
  }
}
