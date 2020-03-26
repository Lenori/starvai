import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ContatoService {

  private url = 'http://starvai.com.br/api/wp-content/themes/starvai';

  async send(nome, email, msg): Promise<any> {

    const endpoint = 'contato.php';

    const data = {
      nome: nome,
      email: email,
      msg: msg
    };

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.post(this.url + '/' + endpoint, data, {headers}).toPromise();
    return response;

  }

  constructor(
    private http: HttpClient
  ) { }
}
