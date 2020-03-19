import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  titulo = 'Blog';

  listas = ['Áudio', 'Vídeo', 'Dicas e Truques'];

  constructor() { }

  ngOnInit() {
  }

}
