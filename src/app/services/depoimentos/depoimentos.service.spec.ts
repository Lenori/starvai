import { TestBed } from '@angular/core/testing';

import { DepoimentosService } from './depoimentos.service';

describe('DepoimentosService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DepoimentosService = TestBed.get(DepoimentosService);
    expect(service).toBeTruthy();
  });
});
