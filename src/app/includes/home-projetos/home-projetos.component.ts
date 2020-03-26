import { Component, OnInit } from '@angular/core';
import {ProjetosService} from '../../services/projetos/projetos.service';

@Component({
  selector: 'app-home-projetos',
  templateUrl: './home-projetos.component.html',
  styleUrls: ['./home-projetos.component.css']
})
export class HomeProjetosComponent implements OnInit {

  projetos: any;
  seletor: any;
  slug: any;
  img: any;

  constructor(
    private projetosService: ProjetosService
  ) { }

  ngOnInit() {

    this.projetosService.all().then(
      data => {
        this.projetos = data;
        console.log(this.projetos);
        this.seletor = this.projetos[0].id;
        this.slug = this.projetos[0].slug;
      }
    );

  }

}
