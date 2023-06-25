import axios from "axios";
import React, { useState, useEffect } from "react";
import { useLocation } from "react-router-dom";
import { confirmAlert } from 'react-confirm-alert';
import 'react-confirm-alert/src/react-confirm-alert.css';


const DeletePostsTable = () => {
    const [posts, setPosts] = useState([]);
    const location = useLocation();
    const token = location.state.token;
    const id = location.state.id;
    const [success, setSuccess] = useState('');

    

    //fetching the users data
    useEffect(() => {
        const fetchPosts = async () => {
            try {
                const response = await axios.get(
                    "http://127.0.0.1:8000/api/post/findall"
                );
                setPosts(response.data.posts);
            } catch (error) {
                console.error("Error:", error);
            }
        };

        fetchPosts();
    }, []);

    // handling delete -------------
    const  HandelDelete =  (postId ) => {
        confirmAlert ( {
          title: 'Confirmation',
          message: 'Are you sure you want to delete this user?',
          buttons: [
            {
              label: 'Yes',
              onClick: () => {
                Delete(postId)
                console.log('User deleted!');
              }
            },
            {
              label: 'No',
              onClick: () => {
                console.log('Deletion canceled!');
              }
            }
          ]
        });
      };
          
    const Delete = async (postId ) => {
        try{
            const config = {
                headers: {
                  Authorization: `Bearer ${token}`,
                },
            };

            await axios.get(`http://127.0.0.1:8000/api/post/destroy/${postId}` , config);
            setSuccess('Post deleted ')
            setPosts((prevPosts) => prevPosts.filter((post) => post.id !== postId));
        }catch(error) {
            console.log('Error : ' ,error);
        }
    };
    // ---------------------------
    // cheking if the array is empty
    if (!Array.isArray(posts)) {
        return <div>Loading...</div>; // Add a loading state or handle the case when users is not an array
    }

    return (
        <>  
            <h3>Delete Annonces</h3>
            {success && <p className="alert alert-success">{success}</p>}
            <table class="table  table-bordered">
                <thead className="table-primary ">
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">title</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Category</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {posts.map((post) => (
                        <tr className="text-left" key={post.id}>
                            <td><img src={`../../../../../../backend/public/'${post.picture_1}`}></img> {post.picture_1}</td>
                            <td>{post.title}</td>
                            <td>{post.description}</td>
                            <td>{post.price}</td>
                            <td>{post.email}</td>
                            <td>{post.phone}</td>
                            <td>{post.Category}</td>
                            <td>{post.ville}</td>
                            <td>
                                    <button
                                    className="btn btn-danger"
                                        variant="danger"
                                        onClick={() => HandelDelete(post.id)}
                                    >
                                        delete
                                    </button>
                            </td>

                        </tr>
                    ))}
                </tbody>
            </table>
        </>
    );
};

export default DeletePostsTable;
