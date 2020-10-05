import {Component, OnDestroy, OnInit} from '@angular/core';
import {PostsService} from '../../services/posts/posts.service';
import {ActivatedRoute, Router} from '@angular/router';
import {CategoriasService} from '../../services/categorias/categorias.service';
import {Subscription} from 'rxjs';

@Component({
  selector: 'app-blog-single',
  templateUrl: './blog-single.component.html',
  styleUrls: ['./blog-single.component.css']
})
export class BlogSingleComponent implements OnInit, OnDestroy {

  id: any;
  post: any;
  titulo: any;
  categorias: any;
  populares: any;
  related;
  hiddenAppendices: boolean;
  subscriptionRoute: Subscription;

  constructor(
    private route: ActivatedRoute,
    private categoriasService: CategoriasService,
    private postsService: PostsService,
    private router: Router
  ) {

    this.router.routeReuseStrategy.shouldReuseRoute = () => false;
    this.subscriptionRoute = this.route.queryParams.subscribe(params => {
      this.hiddenAppendices = params.hiddenAppendices;
    });
  }

  ngOnInit() {

    this.id = this.route.snapshot.params.id;

    this.postsService.single(this.id).then(
      data => {
        this.post = data;
        this.titulo = data.title.rendered;
        this.postsService.pageView(this.id).then(
          view => {
            this.postsService.populares().then(
              pop => {
                this.populares = pop;
              }
            );
            this.postsService.all(4, this.post.categories[0]).then(
              related => {
                this.related = related;
              }
            );
            this.categoriasService.all().then(
              cat => {
                this.categorias = cat;
              }
            );
          }
        );
      }
    );

  }

  ngOnDestroy(): void {
    this.subscriptionRoute.unsubscribe();
  }
}
