delimiter //
create trigger ratingtrigger
after insert on rating
for each row
begin

update user set user.user_rate=(select avg(last_rate) from rating where user.user_id=rating.offerer_id);

end 