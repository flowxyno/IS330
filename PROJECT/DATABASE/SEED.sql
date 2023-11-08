USE leftoff;

-- inserting data into the users table
DELETE FROM users;
ALTER TABLE users auto_increment = 1;
INSERT INTO users (firstName, lastName, userName, passwordHash)
	VALUES
		('Tracy', 'Harvey', 'tharvey', '$2y$10$HwZ.yTiX5z8wII5YBbPzZefUC9lVMSaPIyrMZVR4JD2Ln8hPqonzW'),
        ('Starr', 'Harvey', 'sharvey', '$2y$10$HwZ.yTiX5z8wII5YBbPzZefUC9lVMSaPIyrMZVR4JD2Ln8hPqonzW'),
        ('Kelly', 'Tanner', 'ktanner', '$2y$10$HwZ.yTiX5z8wII5YBbPzZefUC9lVMSaPIyrMZVR4JD2Ln8hPqonzW'),
        ('Scooby', 'Doo', 'sdoo', '$2y$10$HwZ.yTiX5z8wII5YBbPzZefUC9lVMSaPIyrMZVR4JD2Ln8hPqonzW'),
        ('John', 'Doe', 'user', '$2y$10$526bKJDq7XWQSW2KK8IP6.g66DyuYFDAJ/EtXriMU2Kc6LIWhvfKG')
;
    
-- inserting data into the tags table
DELETE FROM tags;
ALTER TABLE tags auto_increment = 1;
INSERT INTO tags (tagname)
	VALUES
		('Anime'),
        ('Cartoons'),
        ('Tv Series')
;
    
    -- inserting data into the series table
DELETE FROM series;
ALTER TABLE series auto_increment = 1;
INSERT INTO series (seriesName, synop, coverArt)
	VALUES
		('Ghost Hunt', 'Telling ghost stories is a favourite pastime of Taniyama Mai and her friends — that is, until she meets 17-year-old Shibuya Kazuya, sent by the Shibuya Psychic Research Centre to investigate paranormal activity at a supposedly haunted school. When Mai gets caught in a dangerous situation, she is rescued by Kazuyas assistant. Saving her lands the assistant incapacitated, and Kazuya demands that Mai become his assistant instead...', 'http:\\www.notreallythere.com'),
        ('Tresse', 'Set in Manila where the mythical creatures of Philippine folklore live in hiding amongst humans, Alexandra Trese finds herself going head to head with a criminal underworld comprised of malevolent supernatural beings.', 'http:\\www.notreallythere.com'),
        ('Star Wars: Ahsoka', 'After the fall of the Galactic Empire, former Jedi Knight Ahsoka Tano investigates an emerging threat to a vulnerable galaxy.', 'http:\\www.notreallythere.com')
;
    
-- inserting data into the seriesTags table
DELETE FROM seriesTags;
ALTER TABLE seriesTags auto_increment = 1;
INSERT INTO seriesTags (seriesID, tagID)
	VALUES
		(1, 1),
        (2, 2),
        (3, 3)
;
    
-- inserting data into the episodes table
DELETE FROM episodes;
ALTER TABLE episodes auto_increment = 1;
INSERT INTO episodes (seriesID, episodeNumber, episodeTitle, episodeSynop)
	VALUES
		(1, 1, 'FILE 1: Evil Spirits All Over! #1', 'Mai meets Naru while exchanging ghost stories with her friends, and learns her school principal has hired him to investigate an allegedly haunted school building. Mai later causes the injury of Narus assistant and is forced to stand in as a temporary replacement. The principal also brings in several exorcists and mediums, and more help arrives in the form of a classmate of Mais, who claims to have the ability to sense spirits.'),
        (1, 2, 'FILE 1: Evil Spirits All Over! #2', 'Each member of the team proposes a different theory as to what is responsible for the odd occurrences. After collecting data overnight, Naru begins to doubt the presence of any spirits and instead theorises that land subsidence is the cause of all the ghostly activity. Mais classmate, Kuroda, fiercely insists that a poltergeist is at work, and evidence appearing to support her idea soon arises.'),
        (1, 3, 'FILE 1: Evil Spirits All Over! #3', 'After disappearing for a night, Naru conducts an experiment involving all those associated with the case. He implants a hypnotic suggestion in their minds regarding a chair in a sealed room moving overnight. His experiment proving successful, Naru reveals his explanation for the latest developments, correctly accusing one of the group of mimicking a poltergeists acts. After the conclusion of the case, Naru offers Mai a part-time job at the SPR, which she accepts.'),
        (1, 4, 'FILE 2: The Doll House #1', 'The SPR team, joined by the exorcists and mediums from the previous case, are requested at a house where poltergeist-like activity has been taking place. Soon after their arrival, the ghostly occurrences escalate, leading Bou-san to conclude the house is haunted by something more than a mere poltergeist. A young girl in the family, Ayami, exhibits strange behavior, claiming her doll Minnie has been speaking to her. The SPR team observe Minnie closely, with disturbing results.'),
        (1, 5, 'FILE 2: The Doll House #2', 'Ayami reveals Minnie has been exerting a strict control over her, punishing her whenever she breaks a promise to Minnie. The team believes the doll is being used as a vessel by a spirit. After Ayami is involved in a near-fatal accident, Naru discovers previous residents of the house have been plagued with frightening incidents, all resulting in the death of young children.'),
        (1, 6, 'FILE 2: The Doll House #3', 'After a failed attempt to exorcise the spirits of the dead children, a well appears in the middle of the living room. Mai is pulled into the well by a malevolent spirit during a second exorcism. While unconscious, she sees the abduction of a little girl and the subsequent suicide of the childs distraught mother. With this new knowledge, the team is able to cleanse the spirits of the woman and children, restoring peace to the old house.'),
        (1, 7, 'FILE 3: The After School Hexer #1', 'The SPR are asked to handle a case at the Yuasa High School, where a series of unusual events are seemingly related to a cursed desk and a haunted clubroom. Rumours circulating the school population implicate a girl with psychokinesis, who had previously vowed to curse to death all the doubters of her gifts.'),
        (1, 8, 'FILE 3: The After School Hexer #2', 'The team arrive at the conclusion that the sheer number of occurrences at the school would require a psychic power far greater than anyone could possibly possess. Coupled with Masakos insistence the school houses no spirits, Naru begins to believe someone is using a form of voodoo, calling on gods to carry out their desires. The discovery of human-like dolls under the desk and in the clubroom seem to confirm this.'),
        (1, 9, 'FILE 3: The After School Hexer #3', 'Evidence against the psychokinetic girl, Kasai, begins to pile up. Mai refuses to believe Kasai is responsible, despite Bou-san and Ayakos beliefs to the contrary, saying she has a feeling within her that Kasai is innocent. While searching for more dolls, Mai is lured to an open manhole by the ghost of a crying child. Naru fails to save her from falling in and instead, they both find themselves inside the hole.'),
        (1, 10, 'FILE 3: The After School Hexer #4', 'Bou-san, Ayako, and Mai destroy the dolls, effectively removing the "curse" on the school. Naru is sent to the hospital as a result of the manhole accident, where he makes a startling revelation regarding the past of someone at the school. He clears Kasais name, but is forced to accuse someone close to her in the process. After the case, the team return to the SPR, where Naru successfully tests Mai for psychic abilities.'),
        (1, 11, 'FILE 4: Ghost Story in the Park!', 'Masako requests Naru investigate a park where over six months, couples have had water dumped over them from thin air. The team, excluding Lin, split up at Masakos suggestion into pairs and they soon attract the spirit of a woman. Taking possession of Masakos body, the woman explains she died soon after being cheated on by her boyfriend. Mai convinces her to let go and move on to heaven, but not until they have forced the cheating partner to acknowledge the hurt he caused.'),
        (1, 12, 'FILE 5: Silent Christmas #1', 'John brings the SPR their next case on Christmas Eve. Children at a local church are being possessed by the ghost of a mute boy who vanished one day during a game of Hide and Seek. The boy, Kenji, hides in the woods once he claims a body. While in control of a child, he mistakes Lin for his dead father and clings to him. John exorcises Kenji from the child he resides in, but Kenji then promptly possesses Mai.'),
        (1, 13, 'FILE 5: Silent Christmas #2', 'While Naru searches for Kenjis body, Lin is ordered to play with Kenji. Lin snaps shortly after and Kenji, still in Mais body, races into the woods. After John and Bou-san find Kenji, Naru tells him his father is waiting for him in heaven and asks him where he is. Kenji shows him the place he had hid and died in and releases Mai, who sees Kenjis tragic death in a dream.'),
        (1, 14, 'FILE 6: Forbidden Pastime #1', 'The highly publicised Ryokuryou High School is brought to the SPRs attention when students report a series of terrifying events, including a ghostly dog attacking them. The SPR gathers information with the help of the school valedictorian, Yasuhara, and learn the incidents began after Sakauchi, a first year student, committed suicide. During the installation of cameras around the school, Mai encounters Sakauchis ghost.'),
        (1, 15, 'FILE 6: Forbidden Pastime #2', 'Mai dreams about the school and notes that dozens of spirits, including will-o-the-wisp, are devouring each other. Masako and Mai later see Saukichis ghost being similarly absorbed. The team discover a popular spirit-summoning game, "Orikiri-sama" may have been spread by Saukichi, possibly resulting in the many spirits inhabiting the school. While retrieving a video tape, Mai finds herself locked in a room with bottles crashing down around her, releasing the smell of formalin.'),
        (1, 16, 'FILE 6: Forbidden Pastime #3', 'Mai wakes up in the nurses office, after several events nearly lead her to her death again. Mais lamentation on learning the SPR have been asked to leave after the latest disasters prompts Naru to muse over a theory. He speculates that the spirits were deliberately called and expected to devour each other until the strongest remained. This spirit would possess the school, but require human sacrifices. Lin discovers the instructions for "Orikiri-sama" have been designed to ensure participants unknowingly contribute to a death spell, the target of which is someone at the school.'),
        (1, 17, 'FILE 6: Forbidden Pastime #4', 'Naru and Lin begin a ritual to return the curse to its casters, thereby leaving leaving the curses target unharmed. Mai learns that this ritual will affect most of the schools student population, as they, while unknowingly, contributed to the curse. Her attempt to stop it fails, but Naru and Lin are able to lift the curse with little harm to the students.'),
        (1, 18, 'FILE 7: The Bloodstained Labyrinth #1', 'Madoka, an associate of Narus, requests the SPR take on a case for the former Prime Minister and investigate the mysterious disappearances of young people at one of his properties. Before the case, Naru asks Yasuhara to pretend to be SPRs director in his stead. The SPR team join two other teams of investigators, one of which requests they all participate in a séance which has an unexpected result.'),
        (1, 19, 'FILE 7: The Bloodstained Labyrinth #2', 'Members of the other teams begin disappearing. In a search of the house, John finds a secret room that enables the SPR team to add to the information they learned from Madoka of the estates past owners. Shortly after, Mai has a dream in which she experiences first-hand the death of someone from the estate.'),
        (1, 20, 'FILE 7: The Bloodstained Labyrinth #3', 'The dream leaves Mai traumatised, but prompts new speculation by the team regarding the houses spirits. Lin carries out a ritual to summon the spirit of one of the missing people, who gives the SPR team a new lead. The discovery of one of the missing peoples corpse induces Oliver Davis, one of the investigators on another team, to reveal himself as an impostor.'),
        (1, 21, 'FILE 7: The Bloodstained Labyrinth #4', 'Naru reveals Madokas true motive behind requesting they take on the case was to expose the fake Oliver Davis. Naru informs the team their job is therefore finished, despite Mais protests. While the group prepares to leave, Masako disappears, and Mai has a dream that allows her to lead the team straight to the missing girl. A malevolent spirit attacks the girls, but Lin is able to ward it off and the team escapes unharmed. With no other way of removing the spirits, the house is later purified by fire.'),
        (1, 22, 'FILE 8: The Cursed House #1', 'SPR is asked by a person who comes all the way out from the seaside to solve a dangerous case, of which three psychics have already attempted to solve and died as a result. Naru is possessed by a spirit when Ayako exorcises a strong spirit possessing a member of the family involved. Mai dreams of the history of the spirits, with her teammates assuming roles within the dream, and Naru guiding her to where the spirits have gone.'),
        (1, 23, 'FILE 8: The Cursed House #2', 'The remaining psychics tour around the area in order to verify Mais dreams. A member of the family tries to commit suicide, fearing that others may be killed as a result of possession. Ayako provides each family member with protective charms, though the two children and another family member refuse to use them. Mai uses the Kuji to prevent Katsuki, one of the family members, from jumping off a cliff, but ends up affecting another family member, Wakako, and effectively wards off the spirits possessing Katsuki and Wakako.'),
        (1, 24, 'FILE 8: The Cursed House #3', 'Nao, a member of the family involved, is confirmed dead and Masako is sent to perform a ritual. Mai has another dream and is woken by Masako when a fire spreads in the main house. Another family member meets a tragic end after being possessed. An army of zombies soon enters the SPRs base to free the spirit that has possessed Naru.'),
        (1, 25, 'FILE 8: The Cursed House #4', 'Bou-san manages to banish the drowned corpses attacking the base, allowing the team some respite. When the sun rises, Ayako volunteers to purify the spirits and performs a successful exorcism, surprising Bou-san and the other members of the team, but notes another force is still at work. Naru wakes up and the team moves to finish off the unseen force causing the disasters. After the team struggles to exorcise with the spirits involved, Naru uses his own psychokinetic powers and finishes the job, only to collapse afterward. He reawakens in the hospital with the rest of the team, cheerfully visiting him in his room.'),
        (2, 1, 'Episode 1', 'When a ghost turns up dead and train passengers go missing, Treses investigation leads her to an aswang clan by the pier and a corrupt city official.'),
        (2, 2, 'Episode 2', 'In a flashback, Treses father searches for a heart-stealing killer. Trese pursues the sons of two clan leaders who may be behind recent transgressions.'),
        (2, 3, 'Episode 3', 'Ramona attempts a blood ritual to exact revenge. Trese, the "boys" and Hank protect an actress as Trese receives a warning of "liars amongst allies."'),
        (2, 4, 'Episode 4', 'While Trese fights to undo a spell that sent zombies to attack the police station, Hank tries to uncover details about the coming turmoil.'),
        (2, 5, 'Episode 5', 'After a rash of bombings, the Council makes a surprising decision. Trese discovers who’s been responsible for manipulating recent events all along.'),
        (2, 6, 'Episode 6', 'With humanity and the supernatural world both in danger, Trese confronts Talagbusao to fight her own destiny — and learns the truth about her father.'),
        (3, 1, 'Part One: Master and Apprentice', 'A valuable prisoner escapes New Republic custody; a search for answers reunites two old friends.'),
        (3, 2, 'Part Two: Toil and Trouble', 'Ahsoka and General Hera Syndulla travel to New Republic shipyards and make an unexpected discovery.'),
        (3, 3, 'Part Three: Time to Fly', 'Hera tangles with New Republic politics while Ahsoka and Sabine Wren voyage to a distant planet.'),
        (3, 4, 'Part Four: Fallen Jedi', 'Hera risks her career to help her friends while Ahsoka and Sabine confront enemies.'),
        (3, 5, 'Part Five: Shadow Warrior', 'Ahsoka confronts her past, while Hera and her allies undertake a rescue mission.'),
        (3, 6, 'Part Six: Far, Far Away', 'The search for Grand Admiral Thrawn reaches beyond the limits of the galaxy.'),
        (3, 7, 'Part Seven: Dreams and Madness', 'Hera must answer to the New Republic, while far, far away, a reunion takes place.')
;
    
-- inserting data into the seriesTrackers table
DELETE FROM seriesTrackers;
ALTER TABLE seriesTrackers auto_increment = 1;
INSERT INTO seriesTrackers (userID, seriesID, episodeID)
	VALUES
		(1, 2, 28),
        (2, 3, 36),
        (3, 1, 11)
;    