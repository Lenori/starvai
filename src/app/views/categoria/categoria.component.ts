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
  listaDeCategorias: any;

  constructor(
    private route: ActivatedRoute,
    private categoriasService: CategoriasService
  ) { }

  ngOnInit() {
    this.buscarNovaCategoria();
    this.buscarTodasCategorias();
  }

  private buscarNovaCategoria(id?: number) {
    this.id = id || this.route.snapshot.params.id;

    this.categoriasService.single(this.id).then(
      data => {
        this.categoria = Object.assign({}, data);
        this.titulo = this.categoria.name;
      }
    );
  }

  private buscarTodasCategorias() {
    this.categoriasService.all().then(
      data => {
        this.listaDeCategorias = data;
      }
    );
  }
}
