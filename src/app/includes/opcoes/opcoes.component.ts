import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-opcoes',
  templateUrl: './opcoes.component.html',
  styleUrls: ['./opcoes.component.css']
})
export class OpcoesComponent implements OnInit {

  @Input()
  opcoes: any;

  constructor() { }

  ngOnInit() {
  }

}
