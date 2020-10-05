import {Component, OnInit, Input, Output, EventEmitter, OnDestroy} from '@angular/core';

@Component({
  selector: 'app-blog-categorias',
  templateUrl: './blog-categorias.component.html',
  styleUrls: ['./blog-categorias.component.css']
})
export class BlogCategoriasComponent implements OnInit, OnDestroy {

  @Input()
  categorias: any;

  @Output()
  mudouCategoria = new EventEmitter<number>();

  constructor() { }

  ngOnInit() {
  }

  ngOnDestroy(): void {
    this.mudouCategoria.unsubscribe();
  }

}
