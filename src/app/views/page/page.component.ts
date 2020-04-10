import { Component, OnInit } from '@angular/core';
import {PagesService} from '../../services/pages/pages.service';
import {ActivatedRoute, Router} from '@angular/router';

@Component({
  selector: 'app-page',
  templateUrl: './page.component.html',
  styleUrls: ['./page.component.css']
})
export class PageComponent implements OnInit {

  page: any;
  id: any;
  titulo: any;

  constructor(
    private route: ActivatedRoute,
    private pagesService: PagesService,
    private router: Router
  ) {

    this.router.routeReuseStrategy.shouldReuseRoute = () => false;

  }

  ngOnInit() {

    this.id = this.route.snapshot.params.id;

    this.pagesService.single(this.id).then(
      data => {
        this.page = data;
        this.titulo = this.page.title.rendered;
      }
    );

  }

}
