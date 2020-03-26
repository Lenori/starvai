import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {CategoriasService} from '../../services/categorias/categorias.service';

@Component({
  selector: 'app-categoria',
  templateUrl: './categoria.component.html',
  styleUrls: ['./categoria.component.css']
})
export class CategoriaComponent implements OnInit {

  id: any;
  titulo: any;
  categoria: any;

  constructor(
    private route: ActivatedRoute,
    private categoriasService: CategoriasService
  ) { }

  ngOnInit() {

    this.id = this.route.snapshot.params.id;

    this.categoriasService.single(this.id).then(
      data => {
        this.categoria = data;
        this.titulo = this.categoria.name;
      }
    );

  }

}
