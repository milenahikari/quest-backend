/*MENU*/
insert into menus (name, icon, `to`, created_at, updated_at) values ('Meu perfil', 'fas fa-user-edit', '/profile', CURRENT_TIMESTAMP, null);
insert into menus (name, icon, `to`, created_at, updated_at) values ("Minhas matérias", "fas fa-chalkboard-teacher", "/my-courses", CURRENT_TIMESTAMP, null);
insert into menus (name, icon, `to`, created_at, updated_at) values ("Medalhas", "fas fa-medal", "/medals", CURRENT_TIMESTAMP, null);
insert into menus (name, icon, `to`, created_at, updated_at) values ("QR Code", "fas fa-qrcode", "/", CURRENT_TIMESTAMP, null);
insert into menus (name, icon, `to`, created_at, updated_at) values ("Avaliar aula", "fas fa-star", "/", CURRENT_TIMESTAMP, null);
insert into menus (name, icon, `to`, created_at, updated_at) values ("Sair", "fas fa-sign-out-alt", "/", CURRENT_TIMESTAMP, null);

/*EXPLANATIONS*/
insert into explanations (title, image, position, parteI, parteII, parteIII, parteIV, created_at, updated_at) values ("APRENDA", "grupoestudo.png", "0px -15px", "Encontre a ajuda perfeita para entender a matéria", "Tire suas dúvidas com um amigo", "Combine o melhor momento para estudar", "", CURRENT_TIMESTAMP, null);
insert into explanations (title, image, position, parteI, parteII, parteIII, parteIV, created_at, updated_at) values ("ENSINE", "ensinar.png", "0px -55px", "Compartilhe seu conhecimento", "Faça novas amizades", "Divirta-se ensinando e aprendendo", "", CURRENT_TIMESTAMP, null);
insert into explanations (title, image, position, parteI, parteII, parteIII, parteIV, created_at, updated_at) values ("CONQUISTE", "premio.jpg", "0px -20px", "Colabore ensinando e ganhe estrelas", "Cumpra metas e colecione pedras preciosas", "Seja um membro", "É grátis :)", CURRENT_TIMESTAMP, null);
