import { Component, OnInit } from '@angular/core';
import {EtapasService} from '../../services/etapas/etapas.service';

@Component({
  selector: 'app-etapas',
  templateUrl: './etapas.component.html',
  styleUrls: ['./etapas.component.css']
})
export class EtapasComponent implements OnInit {

  etapas: any;
  openEtapa: any;

  constructor(
    private etapasService: EtapasService
  ) { }

  ngOnInit() {

    this.etapasService.all().then(
      data => {
        this.etapas = data;
      }
    );

  }

}
