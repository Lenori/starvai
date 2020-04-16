import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FormArquitetoComponent } from './form-arquiteto.component';

describe('FormArquitetoComponent', () => {
  let component: FormArquitetoComponent;
  let fixture: ComponentFixture<FormArquitetoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FormArquitetoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FormArquitetoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
