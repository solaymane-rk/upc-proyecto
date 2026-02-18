import { Routes } from '@angular/router';

import { HomeComponent } from './pages/home/home.component';
import { FeaturesComponent } from './pages/features/features.component';
import { DevelopersComponent } from './pages/developers/developers.component';
import { ContactComponent } from './pages/contact/contact.component';
import { LoginComponent } from './pages/auth/login/login.component';
import { PrivacyPolicyComponent } from './pages/privacy-policy/privacy-policy.component';

export const routes: Routes = [
    {path: '', component: HomeComponent},
    {path: 'inicio', component: HomeComponent},
    {path: 'proyecto', component: FeaturesComponent},
    {path: 'desarrolladores-web', component: DevelopersComponent},
    {path: 'contacto', component: ContactComponent},
    {path: 'login', component: LoginComponent},
    {path: 'politica-privacidad', component:PrivacyPolicyComponent}
    
];
