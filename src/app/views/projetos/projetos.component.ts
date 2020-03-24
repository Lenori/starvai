import { Component, OnInit } from '@angular/core';
import {ActivatedRoute} from '@angular/router';
import {ProjetosService} from '../../services/projetos/projetos.service';

@Component({
  selector: 'app-projetos',
  templateUrl: './projetos.component.html',
  styleUrls: ['./projetos.component.css']
})
export class ProjetosComponent implements OnInit {

  id: any;
  projeto: any;
  opcoes: any;
  texto: any;
  subtitulo: any;

  titulo = 'Projeto';

  constructor(
    private route: ActivatedRoute,
    private projetosService: ProjetosService
  ) { }

  ngOnInit() {

    this.id = this.route.snapshot.params.id;

    this.projetosService.one(this.id).then(
      data => {
        this.projeto = data[0][0];
        this.opcoes = data[1];
        console.log(this.opcoes);
        this.texto = this.projeto.resume;
        this.subtitulo = this.projeto.title;
      }
    );

  }

}
