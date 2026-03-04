import { Component, HostListener, inject, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DevelopersService } from '../../services/developers.service'; 
import { Developer } from './developer.model'; 

@Component({
  selector: 'app-developers',
  imports: [CommonModule],
  templateUrl: './developers.component.html'
})
export class DevelopersComponent implements OnInit {
  private developersService = inject(DevelopersService);

  developers: Developer[] = [];
  loading = true;
  error = false;

  indiceActual = 0;
  visibles = 3;

  ngOnInit() {
    this.actualizarVisibles();

    this.developersService.getAll().subscribe({
      next: (data) => {
        this.developers = data;
        this.loading = false;
        console.log('✅ Developers:', this.developers);
      },
      error: (err) => {
        this.error = true;
        this.loading = false;
        console.error('Error:', err);
      }
    });
  }

  @HostListener('window:resize')
  onResize() {
    this.actualizarVisibles();
  }

  actualizarVisibles() {
    const w = window.innerWidth;
    if (w < 640) {
      this.visibles = 1;
    } else if (w < 1024) {
      this.visibles = 2;
    } else {
      this.visibles = 3;
    }
    const max = this.developers.length - this.visibles;
    if (this.indiceActual > max) this.indiceActual = Math.max(0, max);
  }

  siguiente() {
    const max = this.developers.length - this.visibles;
    this.indiceActual = this.indiceActual < max ? this.indiceActual + 1 : 0;
  }

  anterior() {
    const max = this.developers.length - this.visibles;
    this.indiceActual = this.indiceActual > 0 ? this.indiceActual - 1 : max;
  }

  irA(index: number) {
    this.indiceActual = index;
  }

  getDots() {
    const total = this.developers.length - this.visibles + 1;
    return Array(Math.max(total, 0)).fill(0);
  }
}
