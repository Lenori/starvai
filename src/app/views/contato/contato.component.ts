import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contato',
  templateUrl: './contato.component.html',
  styleUrls: ['./contato.component.css']
})
export class ContatoComponent implements OnInit {

  titulo = 'Contato';
  texto = 'Já tem uma ideia para o seu projeto? Conte os detalhes e deixe a gente transformá-lo em realidade!';

  constructor() { }

  ngOnInit() {
  }

}
