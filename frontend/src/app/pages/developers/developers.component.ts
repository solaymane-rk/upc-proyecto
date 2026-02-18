import { Component } from '@angular/core';

@Component({
  selector: 'app-developers',
  imports: [],
  templateUrl: './developers.component.html',
  styleUrl: './developers.component.css'
})
export class DevelopersComponent {
  developers = [
    {
      id: 1,
      nombre: 'Jose Miguel Risco Muñoz',
      descripcion: 'Lorem ipsum dolor sit amet consectetur.',
      linkedin: 'https://www.linkedin.com/in/jose-miguel-risco-mu%C3%B1oz-01b108258/',
      github: 'https://github.com/jose050204',
      foto: ''
    },
    {
      id: 2,
      nombre: 'Jeremy Intriago Pachay',
      descripcion: 'Lorem ipsum dolor sit amet consectetur.',
      linkedin: 'https://www.linkedin.com/in/jeremy-intriago-6735202b3/',
      github: 'https://github.com/injerr',
      foto: ''
    },
    {
      id: 3,
      nombre: 'Justin Monteiro Delicado',
      descripcion: 'Lorem ipsum dolor sit amet consectetur.',
      linkedin: 'https://www.linkedin.com/in/justin-monteiro-delicado-109b1b262/',
      github: 'https://github.com/duustixx',
      foto: ''
    },
    {
      id: 4,
      nombre: 'Marc Gilavert Orea',
      descripcion: 'Lorem ipsum dolor sit amet consectetur.',
      linkedin: 'https://www.linkedin.com/in/marc-gilavert-orea-b1851a2b3/',
      github: 'https://github.com/duustixx',
      foto: ''
    },
    {
      id: 5,
      nombre: 'Solaymane Roukdi Amhaj',
      descripcion: 'Lorem ipsum dolor sit amet consectetur.',
      linkedin: 'https://www.linkedin.com/in/solaymane/',
      github: 'https://github.com/solaymane-rk',
      foto: ''
    },
  ];

  habilidades = [
    'Lorem ipsum dolor sit amet consectetur.',
    'Lorem ipsum dolor sit amet consectetur.',
    'Lorem ipsum dolor sit amet consectetur.',
    'Lorem ipsum dolor sit amet consectetur.'
  ];

  indiceActual = 0;

  siguiente() {
    if (this.indiceActual < this.developers.length -3) {
      this.indiceActual++;
    } else {
      this.indiceActual = 0;
    }
  }

  anterior() {
    if(this.indiceActual > 0) {
      this.indiceActual--;
    } else {
      this.indiceActual = this.developers.length - 3;
    }
  }

  getDevsVisibles() {
    return this.developers.slice(this.indiceActual, this.indiceActual + 3);
  }

  getDots() {
    return Array(this.developers.length - 2).fill(0);
  }

}
