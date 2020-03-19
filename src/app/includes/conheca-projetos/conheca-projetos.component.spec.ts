import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConhecaProjetosComponent } from './conheca-projetos.component';

describe('ConhecaProjetosComponent', () => {
  let component: ConhecaProjetosComponent;
  let fixture: ComponentFixture<ConhecaProjetosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConhecaProjetosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConhecaProjetosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
