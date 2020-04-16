import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProjetosService {

  private url = 'https://starvai.com.br/api/wp-json/wp/v2';

  async all(): Promise<any> {

    const endpoint = 'projetos';

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint, {headers}).toPromise();
    return response;

  }

  async one(id): Promise<any> {

    const endpoint = 'projetos';

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint + '/' + id, {headers}).toPromise();
    return response;

  }

  constructor(
    private http: HttpClient
  ) { }
}
