# Generated by Django 3.1 on 2023-02-16 12:53

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Topic',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('created_at', models.DateTimeField()),
                ('updated_at', models.DateTimeField()),
                ('deleted_at', models.DateTimeField()),
                ('name', models.CharField(max_length=100)),
                ('toc', models.TextField()),
                ('memo', models.CharField(max_length=1000)),
            ],
            options={
                'db_table': 'topics',
            },
        ),
    ]
