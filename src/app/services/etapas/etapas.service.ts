import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EtapasService {

  private url = 'http://starvai.com.br/api/wp-json/wp/v2';

  async all(): Promise<any> {

    const endpoint = 'etapas';

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint, {headers}).toPromise();
    return response;

  }

  constructor(
    private http: HttpClient
  ) { }
}
