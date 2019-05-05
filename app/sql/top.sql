select
  p.*,
  c.*
from
  users u
inner join
  posts p
on(u.id = p.user_id)
inner join
  comments c
on(u.id = p.user_id)
where
   p.id = c.post_id
order by
  p.created_at desc;
