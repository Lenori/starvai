import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {RouterModule} from '@angular/router';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';

import { ProjetosComponent } from './views/projetos/projetos.component';
import { TitleComponent } from './includes/title/title.component';
import { HeaderComponent } from './includes/header/header.component';
import { FooterComponent } from './includes/footer/footer.component';
import { EtapasComponent } from './includes/etapas/etapas.component';
import { OpcoesComponent } from './includes/opcoes/opcoes.component';
import { FaqComponent } from './includes/faq/faq.component';
import { FormContatoComponent } from './includes/form-contato/form-contato.component';
import { TrabalhosComponent } from './views/trabalhos/trabalhos.component';
import { BlogComponent } from './views/blog/blog.component';
import { BlogRecentesComponent } from './includes/blog-recentes/blog-recentes.component';
import { BlogCategoriasComponent } from './includes/blog-categorias/blog-categorias.component';
import { HomeComponent } from './views/home/home.component';
import { DepoimentosComponent } from './includes/depoimentos/depoimentos.component';
import { ConhecaProjetosComponent } from './includes/conheca-projetos/conheca-projetos.component';
import { HomeBannerComponent } from './includes/home-banner/home-banner.component';
import { HomeProjetosComponent } from './includes/home-projetos/home-projetos.component';
import { ContatoComponent } from './views/contato/contato.component';
import { HttpClientModule } from '@angular/common/http';
import { BlogSingleComponent } from './includes/blog-single/blog-single.component';
import { CategoriaComponent } from './views/categoria/categoria.component';
import { BlogListaComponent } from './includes/blog-lista/blog-lista.component';
import { PageComponent } from './views/page/page.component';
import { SolucoesComponent } from './views/solucoes/solucoes.component';

const appRoutes = [

  { path: '', component: HomeComponent},
  { path: 'projetos/:slug/:id', component: ProjetosComponent},
  { path: 'solucoes', component: SolucoesComponent},
  { path: 'trabalhos', component: TrabalhosComponent},
  { path: 'blog', component: BlogComponent},
  { path: 'contato', component: ContatoComponent},
  { path: 'blog/:slug/:id', component: BlogSingleComponent},
  { path: 'projeto/:slug/:id', component: BlogSingleComponent},
  { path: 'categoria/:slug/:id', component: CategoriaComponent},
  { path: 'pagina/:slug/:id', component: PageComponent}

];

@NgModule({
  declarations: [
    AppComponent,
    ProjetosComponent,
    TitleComponent,
    HeaderComponent,
    FooterComponent,
    EtapasComponent,
    OpcoesComponent,
    FaqComponent,
    FormContatoComponent,
    TrabalhosComponent,
    BlogComponent,
    BlogRecentesComponent,
    BlogCategoriasComponent,
    HomeComponent,
    DepoimentosComponent,
    ConhecaProjetosComponent,
    HomeBannerComponent,
    HomeProjetosComponent,
    ContatoComponent,
    BlogSingleComponent,
    CategoriaComponent,
    BlogListaComponent,
    PageComponent,
    SolucoesComponent
  ],
  imports: [
    HttpClientModule,
    FormsModule,
    RouterModule.forRoot(
      appRoutes,
      {
        enableTracing: false, // <-- debugging purposes only
        anchorScrolling: 'enabled',
        onSameUrlNavigation: 'reload'
      }
    ),
    BrowserModule,
    RouterModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
