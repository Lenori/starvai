import {Component, Input, OnInit} from '@angular/core';
import {ContatoService} from '../../services/contato/contato.service';
import {PagesService} from '../../services/pages/pages.service';

@Component({
  selector: 'app-form-arquiteto',
  templateUrl: './form-arquiteto.component.html',
  styleUrls: ['./form-arquiteto.component.css']
})
export class FormArquitetoComponent implements OnInit {

  @Input()
  paginaContato: boolean;

  form: any = {};
  page: any;
  loading: any;
  sent: any;
  message: any;

  constructor(
    private contatoService: ContatoService,
    private pagesService: PagesService
  ) { }

  onSubmit() {

    this.loading = true;

    this.contatoService.send(this.form.name, this.form.email, this.form.msg).then(
      data => {
        if (data.success === true) {
          this.message = data.message;
          this.sent = true;
        } else if (data.error === true) {
          this.message = data.message;
          this.sent = true;
        }
        this.loading = false;
      }
    );

  }

  ngOnInit() {

    this.sent = false;
    this.loading = false;

    this.pagesService.single('2946').then(
      data => {
        this.page = data;
        console.log(this.page);
      }
    );

  }

}
