import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-blog-recentes',
  templateUrl: './blog-recentes.component.html',
  styleUrls: ['./blog-recentes.component.css']
})
export class BlogRecentesComponent implements OnInit {

  @Input()
  categoria: any;

  constructor() { }

  ngOnInit() {
  }

}
