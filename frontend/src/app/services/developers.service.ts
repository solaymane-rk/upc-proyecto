import { Injectable, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Developer } from '../pages/developers/developer.model';

@Injectable({
  providedIn: 'root'
})
export class DevelopersService {
  private readonly apiUrl = 'http://127.0.0.1:8000/api/desarrolladores';
  private http = inject(HttpClient);

  getAll(): Observable<Developer[]> {
    return this.http.get<Developer[]>(this.apiUrl);
  }
}
