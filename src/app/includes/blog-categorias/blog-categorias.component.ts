import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-blog-categorias',
  templateUrl: './blog-categorias.component.html',
  styleUrls: ['./blog-categorias.component.css']
})
export class BlogCategoriasComponent implements OnInit {

  @Input()
  categorias: any;

  constructor() { }

  ngOnInit() {
  }

}
