import { Component, OnInit } from '@angular/core';
import {CategoriasService} from '../../services/categorias/categorias.service';

@Component({
  selector: 'app-blog',
  templateUrl: './blog.component.html',
  styleUrls: ['./blog.component.css']
})
export class BlogComponent implements OnInit {

  categorias: any;

  titulo = 'Blog';

  constructor(
    private categoriaService: CategoriasService
  ) { }

  ngOnInit() {

    this.categoriaService.all().then(
      data => {
        this.categorias = data;
      }
    );

  }

}
