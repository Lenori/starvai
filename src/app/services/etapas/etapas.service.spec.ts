import { TestBed } from '@angular/core/testing';

import { EtapasService } from './etapas.service';

describe('EtapasService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: EtapasService = TestBed.get(EtapasService);
    expect(service).toBeTruthy();
  });
});
