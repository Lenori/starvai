import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SolucoesComponent } from './solucoes.component';

describe('SolucoesComponent', () => {
  let component: SolucoesComponent;
  let fixture: ComponentFixture<SolucoesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SolucoesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SolucoesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
