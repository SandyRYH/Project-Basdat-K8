PGDMP     5    8                y         	   ipbsepeda    14.1    14.1                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16394 	   ipbsepeda    DATABASE     m   CREATE DATABASE ipbsepeda WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE ipbsepeda;
                postgres    false            �            1259    16463    admin    TABLE     U  CREATE TABLE public.admin (
    id integer NOT NULL,
    username character varying(16) NOT NULL,
    password character varying(255) NOT NULL,
    mahasiswa character varying(50),
    gender character varying(50),
    fakultas character varying(50),
    departemen character varying(50),
    alamat text,
    image character varying(50)
);
    DROP TABLE public.admin;
       public         heap    postgres    false            �            1259    16462    admin_id_seq    SEQUENCE     �   CREATE SEQUENCE public.admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.admin_id_seq;
       public          postgres    false    210                       0    0    admin_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.admin_id_seq OWNED BY public.admin.id;
          public          postgres    false    209            �            1259    16541 	   mahasiswa    TABLE       CREATE TABLE public.mahasiswa (
    nim character varying(11) NOT NULL,
    mahasiswa character varying(50) NOT NULL,
    gender character varying(50) NOT NULL,
    fakultas character varying(50) NOT NULL,
    departemen character varying(50) NOT NULL,
    alamat text
);
    DROP TABLE public.mahasiswa;
       public         heap    postgres    false            �            1259    16548 
   peminjaman    TABLE     �   CREATE TABLE public.peminjaman (
    nim character varying(11) NOT NULL,
    mahasiswa character varying(50) NOT NULL,
    jenis_sepeda character varying(50) NOT NULL,
    tanggal_meminjam date NOT NULL
);
    DROP TABLE public.peminjaman;
       public         heap    postgres    false            �            1259    16553    sepeda    TABLE     �   CREATE TABLE public.sepeda (
    kode character varying NOT NULL,
    jenis character varying NOT NULL,
    tersedia integer,
    jumlah integer
);
    DROP TABLE public.sepeda;
       public         heap    postgres    false            h           2604    16466    admin id    DEFAULT     d   ALTER TABLE ONLY public.admin ALTER COLUMN id SET DEFAULT nextval('public.admin_id_seq'::regclass);
 7   ALTER TABLE public.admin ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            �          0    16463    admin 
   TABLE DATA           o   COPY public.admin (id, username, password, mahasiswa, gender, fakultas, departemen, alamat, image) FROM stdin;
    public          postgres    false    210   �       �          0    16541 	   mahasiswa 
   TABLE DATA           Y   COPY public.mahasiswa (nim, mahasiswa, gender, fakultas, departemen, alamat) FROM stdin;
    public          postgres    false    211   e       �          0    16548 
   peminjaman 
   TABLE DATA           T   COPY public.peminjaman (nim, mahasiswa, jenis_sepeda, tanggal_meminjam) FROM stdin;
    public          postgres    false    212                     0    16553    sepeda 
   TABLE DATA           ?   COPY public.sepeda (kode, jenis, tersedia, jumlah) FROM stdin;
    public          postgres    false    213   M                  0    0    admin_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.admin_id_seq', 1, true);
          public          postgres    false    209            j           2606    16470    admin admin_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.admin DROP CONSTRAINT admin_pkey;
       public            postgres    false    210            l           2606    16547    mahasiswa mahasiswa_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (nim);
 B   ALTER TABLE ONLY public.mahasiswa DROP CONSTRAINT mahasiswa_pkey;
       public            postgres    false    211            n           2606    16552    peminjaman peminjaman_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.peminjaman
    ADD CONSTRAINT peminjaman_pkey PRIMARY KEY (nim);
 D   ALTER TABLE ONLY public.peminjaman DROP CONSTRAINT peminjaman_pkey;
       public            postgres    false    212            p           2606    16559    sepeda sepeda_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.sepeda
    ADD CONSTRAINT sepeda_pkey PRIMARY KEY (kode);
 <   ALTER TABLE ONLY public.sepeda DROP CONSTRAINT sepeda_pkey;
       public            postgres    false    213            �   �   x�3�LL����T1�T14P	H4u�*..�(�N	1v�-q�IM��2H/.�7-J�*	��M�	v̨�LKp˯�tJLO,VJ�ML�H����I�����n�����9��
����%�E�N���Ek�
�ҹb���� �y,H      �   �   x����
�0E�/O�hI����V� :�\�?�1)�P���B����ធ����BƔ���:�-�j};>,˼J)7c��������yv��R
*À�a:��v�0Js*p�;�Ά��j`�����x~F0a������=&^��z��3��B�X�      �   +   x�s7310420406���L-J�4202�54�52������ �-�             x���,.I�45 "�=... /��     