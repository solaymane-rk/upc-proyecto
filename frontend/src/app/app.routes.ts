import { Routes } from '@angular/router';
import path from 'node:path';
import { HomeComponent } from './pages/home/home.component';
import { FeaturesComponent } from './pages/features/features.component';
import { DevelopersComponent } from './pages/developers/developers.component';

export const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'inicio', component: HomeComponent},
    {path: 'proyecto', component: FeaturesComponent},
    {path: 'desarrolladores-web', component: DevelopersComponent}
];
