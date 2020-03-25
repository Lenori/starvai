import {Component, OnDestroy, OnInit} from '@angular/core';
import {DepoimentosService} from '../../services/depoimentos/depoimentos.service';

@Component({
  selector: 'app-depoimentos',
  templateUrl: './depoimentos.component.html',
  styleUrls: ['./depoimentos.component.css']
})
export class DepoimentosComponent implements OnInit, OnDestroy {

  depoimentos: any;
  lista: any;
  timer: any;
  ativo: any;

  carrossel(lista) {

    if (this.ativo === lista.length) {
      this.ativo = lista[0];
    } else {
      this.ativo++;
    }

  }

  constructor(
    private depoimentosService: DepoimentosService
  ) { }

  ngOnInit() {

    this.ativo = null;
    this.lista = [];

    this.depoimentosService.all().then(
      data => {
        this.depoimentos = data;
        this.depoimentos.forEach(item => {
          this.lista.push(item.id);
        });
        this.ativo = this.lista[0];
        this.timer = window.setInterval(() => this.carrossel(this.lista), 5000);
      }
    );

  }

  ngOnDestroy() {
    clearInterval(this.timer);
  }

}
