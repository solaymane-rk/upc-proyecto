import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';

@Component({
  selector: 'app-privacy-policy',
  imports: [CommonModule],
  templateUrl: './privacy-policy.component.html',
  styleUrl: './privacy-policy.component.css'
})
export class PrivacyPolicyComponent {

  dataItems: string[] = [
    'Nombre y apellidos',
    'Dirección de correo electrónico',
    'Instituto u Organización',
    'Comentarios o consultas que nos remita voluntariamente'
  ];
 
  rights: { title: string; desc: string }[] = [
    { title: 'Acceso', desc: 'conocer qué datos tratamos sobre usted' },
    { title: 'Rectificación', desc: 'corregir datos inexactos o incompletos' },
    { title: 'Supresión', desc: 'solicitar la eliminación de sus datos' },
    { title: 'Oposición', desc: 'oponerse al tratamiento de sus datos' },
    { title: 'Limitación', desc: 'restringir el tratamiento en ciertos casos' },
    { title: 'Portabilidad', desc: 'recibir sus datos en formato estructurado' }
  ];
}
