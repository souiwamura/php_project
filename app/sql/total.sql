【日ごと】〜本日分のみ
select
 count(created_at) as day_count,
 date_format(created_at, '%Y%年%m%月%d%日') as date
from
 posts
where
 date(created_at) = date(now())
group by date(created_at)
order by created_at;

【週ごと】〜現在から今日含めた手前７日間(付き跨ぎも可能)
select
 count(created_at) as week_count,
from
 posts
where
 date(created_at)
between
  (curdate() - interval 1 week)
and
  curdate()
group by date(created_at)
order by created_at;

【月ごと】〜今日日付の年月を基準に月集計
select
 count(created_at) as month_count,
 date_format(created_at, '%Y%年%m%月') as month
from
 posts
where
 date_format(created_at, '%Y%m') = date_format(curdate(), '%Y%m')
group by month;
