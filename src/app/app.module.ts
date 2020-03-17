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

const appRoutes = [

  { path: 'projetos', component: ProjetosComponent}

];

@NgModule({
  declarations: [
    AppComponent,
    ProjetosComponent,
    TitleComponent,
    HeaderComponent,
    FooterComponent,
    EtapasComponent,
    OpcoesComponent
  ],
  imports: [
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
