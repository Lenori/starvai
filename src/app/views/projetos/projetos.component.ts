import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-projetos',
  templateUrl: './projetos.component.html',
  styleUrls: ['./projetos.component.css']
})
export class ProjetosComponent implements OnInit {

  titulo = 'Projeto';
  subtitulo = 'Safehouse';
  texto = 'O projeto Safehouse contém soluções que automatizam a segurança da sua casa para que você e sua família possam dormir mais tranquilamente, sabendo que sua casa está sendo vigiada mesmo que você esteja do outro lado do mundo!';

  constructor() { }

  ngOnInit() {
  }

}
