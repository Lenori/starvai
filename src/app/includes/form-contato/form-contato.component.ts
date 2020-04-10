import { Component, OnInit, Input } from '@angular/core';
import {ContatoService} from '../../services/contato/contato.service';

@Component({
  selector: 'app-form-contato',
  templateUrl: './form-contato.component.html',
  styleUrls: ['./form-contato.component.css']
})
export class FormContatoComponent implements OnInit {

  @Input()
  paginaContato: boolean;

  form: any = {};
  loading: any;
  sent: any;
  message: any;

  constructor(
    private contatoService: ContatoService
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

  }

}
