import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PagesService {

  private url = 'https://starvai.com.br/api/wp-json/wp/v2';

  async all(): Promise<any> {

    const endpoint = 'pages';

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint, {headers}).toPromise();
    return response;

  }

  async single(id): Promise<any> {

    const endpoint = 'pages/' + id;

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint + '?_embed', {headers}).toPromise();
    return response;

  }

  constructor(
    private http: HttpClient
  ) { }
}
