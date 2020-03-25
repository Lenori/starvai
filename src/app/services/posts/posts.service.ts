import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PostsService {

  private url = 'http://starvai.com.br/api/wp-json/wp/v2';

  async all(perPage, category): Promise<any> {

    const endpoint = 'posts?per_page=' + perPage + '&categories=' + category + '&_embed';

    const headers = new HttpHeaders();
    headers.append('Content-Type', 'application/json');

    const response = await this.http.get(this.url + '/' + endpoint, {headers}).toPromise();
    console.log(response);
    return response;

  }

  constructor(
    private http: HttpClient
  ) { }
}
