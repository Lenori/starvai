import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {RouterModule} from '@angular/router';

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

const appRoutes = [

  { path: '', component: HomeComponent},
  { path: 'projetos/:slug/:id', component: ProjetosComponent},
  { path: 'trabalhos', component: TrabalhosComponent},
  { path: 'blog', component: BlogComponent},
  { path: 'contato', component: ContatoComponent}

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
    ContatoComponent
  ],
  imports: [
    HttpClientModule,
    RouterModule.forRoot(
      appRoutes,
      {enableTracing: false} // <-- debugging purposes only
    ),
    BrowserModule,
    RouterModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
